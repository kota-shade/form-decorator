'use strict';
/**
 * Created by kota on 01.03.17.
 */

/**
 * Список обработчиков для внешних селекторов
 */
var ExternalSelectList = ExternalSelectList || {
        ExternalSelect: function (element) {
            var me = this;

            me.select = function (options) {
                alert('Необходимо переопределить метод получения данных для внешнего селектора');
            };

            me.setValue = function (id, value) {
                var wrapEl = $(element).closest('.ext-select');
                $(wrapEl).find('input[name $= "[value]"]').val(value).trigger('change');
                $(wrapEl).find('input[name $= "[id]" ]').val(id).trigger('change').trigger('change_finished');
            };
            me.getValue = function() {
                var wrapEl = $(element).closest('.ext-select');
                var value = $(wrapEl).find('input[name $= "[id]" ]').val();
                return value;
            }
        }
    };

/**
 * Аналогичен базовому ExternalSelect, только будет показано окно диалога через commonDialog
 * сам метод commonDialog зависит от реализации (bootstrap, ui...)
 *
 * Наследуемся от данного класса, определяем обработчик click для нужных нам кнопок, если необходимо
 * @constructor
 */
ExternalSelectList.ExternalSelectDialog = function (element) {
    var me = this;
    ExternalSelectList.ExternalSelect.apply(me, arguments);

    me.header = 'Выберите значение';
    me.body = 'Данные загружаются...';
    me.buttons = [
        {
            'data-button-key': 'OK',
            text: 'Выбрать',
            click: function(dialogElement) {
                $(dialogElement).find('input:radio:checked').each(function(){
                    var value = $(this).val();
                    var name = $(this).attr('data-value');
                    me.setValue(value, name);
                });
                return true;
            }
        },
        {
            'data-button-key': 'Cancel',
            text: 'Закрыть'
        }

    ];
    me.options = {
        width: 'auto'
    };

    me.select = function (options) {
        //console.log('KOTA_OPT', options.options);
        new commonDialog(options.header, options.body, options.buttons, options.options);
    }
};

/**
 * предназначен для выбора множественных значений через диалог и установку через tokenfield
 * @param element
 * @constructor
 */
ExternalSelectList.ExternalSelectDialogMulti = function (element) {
    var me = this;
    ExternalSelectList.ExternalSelectDialog.apply(me, arguments);

    me.buttons = [
        {
            'data-button-key': 'OK',
            text: 'Выбрать',
            click: function(dialogElement) {
                // console.log('сохранем токены ', JqGridIdOfSelectedRows);

                //Очищаем поле токенов
                 $($(element).closest('div')).find('.tokenfield .token .close').each(function () {
                        $(this).trigger('click');
                 });


                me.setValue(JqGridIdOfSelectedRows);
                me.actionSelect();
                return true;
            }
        },
        // {
        //     'data-button-key': 'all',
        //     text: 'Выбрать всё',
        //     click: function(dialogElement) {
        //         me.setValue({'-1': 'Выбрано всё'});
        //         me.actionSelect();
        //         return true;
        //     }
        // },
        {
            'data-button-key': 'Cancel',
            text: 'Закрыть'
        }

    ];

    me.actionSelect = function () {

    };

    me.findExtSelectMulti = function() {
        //console.log('el', element);
        var wrapEl = $(element).siblings('.ext-select-wrapper');
        //console.log('WRAP ', wrapEl);
        var selectElement = $(wrapEl).find('.ext-select-multi');
        return selectElement;
    };

    /**
     * Получение массива ранее выбранных значений
     */
    me.getValue = function() {
        var selectElement = me.findExtSelectMulti();
        var elementValue = {};
        $('div.token', selectElement.closest('div.tokenfield')).each(function () {
            var data = $(this).data('value');
            if (data['value'] !== undefined) {
                elementValue[''+data['value']] = data['label'];
            }
        });
        return elementValue;
    };

    /**
     * Устанавливает значения во элемент внешнего селектора
     * @param data
     */
    me.setValue = function (data) {
        var selectElement = me.findExtSelectMulti();

        for (var key in data) {
            if (data.hasOwnProperty(key) == false) {continue;}
            me.setValueItem(selectElement, key, data[key]);
        }

        //NB!!! информируем, что изменение данных закончено,т.к. оно может меняться не за один раз, то событие change не подходит
        $(selectElement).trigger('change_finished');
    };

    me.setValueItem = function(selectElement, key, value) {
        var notOverlap = true;
        $('div.token', selectElement.closest('div.tokenfield')).each(function () {
            var value = $(this).data('value');
            if (value.value == key) {
                notOverlap = false;
            }
        });

        if (notOverlap)
            $(selectElement)
                .tokenfield('createToken', {
                    value: key,
                    label: value
                });
    };

    me.delValue = function (selectElement) {
        $(selectElement).find('.token a.close').each(function () {
            $(this).click();
        });
    };

};

/**
 * Пример реализации своего обработчика для получения значений
 *
 * ExternalSelectList.Test = function () {
 *    var me = this;
 *    ExternalSelectList.ExternalSelect.apply(me, arguments);
 *    me.select = function() {
 *       ...вызов диалога, и вызов метода с выбранными данными:
 *        me.setValue('testValue', 'testName');
 *    }
 * };
 */

var ExternalSelectFLAG;

$(document).ready(function() {
    if (ExternalSelectFLAG === true) {
        return; //защита от повторной инициализации
    }
    ExternalSelectFLAG = true;

    /**
     * вызов внешнего селектора по нажатию на elementButton
     * @param elementButton
     */
    var doSelectHandler = function(elementButton) {
        var hdlName = $(elementButton).attr('data-clickHandler');
        if (ExternalSelectList[hdlName] === undefined) {
            throw new Error('Определите обработчик ExternalSelectList['+hdlName+']');
        }
        var hdl = new ExternalSelectList[hdlName](elementButton);
        hdl.select(hdl);
    };

    $(document).on('click', '.ext-select-search', function(){

        /**
         * Сохраняем выбранные значения для чекбоксов
         */
        window.JqGridIdOfSelectedRows = {}; // массив хранит выбранные id чекбоксов, для сохранения при переключении страниц
        var tokens = $($(this).closest('div')).find('.tokenfield .token');
        $(tokens).each(function() {
            var dataToken = $(this).data('value');
            JqGridIdOfSelectedRows[dataToken.value] = dataToken.label;
        });

        // console.log('выбранное ранее токены',JqGridIdOfSelectedRows);
        doSelectHandler(this);
    });
});