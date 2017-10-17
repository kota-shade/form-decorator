/**
 * Created by kota on 29.07.17.
 */
$.extend($.fn.fmatter , {
    buttonWrapperFormatter: function(cellvalue, options, rowdata) {
        //console.log(rowdata, options);
        var me = this;
        me.getItem = function(name, data) {
            var type = data['type'] || 'span';
            var ret='';
            switch (type) {
                case 'button':
                    ret = me.getItemButton(name, data, rowdata);
                    break;
                case 'span':
                default:
                    ret = '<'+type+' ';
                    for (var key in data) {
                        if (data.hasOwnProperty(key) === false) { continue; }
                        ret += key + '="'+data[key]+'" ';
                    }
                    ret += 'data-id="'+rowdata['id']+'"';
                    ret += '>';
                    break;
            }

            return ret;
        };
        me.getItemButton = function(name, data, rowdata) {
            var ret = '<button class="btn btn-xs btn-default"';
            for (var key in data) {
                if (data.hasOwnProperty(key) === false) { continue; }
                if (data[key] === 'class') {continue;}
                ret += key + '="'+data[key]+'" ';
            }
            ret += 'data-id="'+rowdata['id']+'"';
            ret += '><span ';
            if (data['class'] !== undefined) {
                ret += 'class="'+data['class']+'" ';
            }
            ret += '></span></button>';
            return ret;
        };

        var ret = '';
        for(var name in cellvalue) {
            if (cellvalue.hasOwnProperty(name) === false) { continue; }
            ret += me.getItem(name, cellvalue[name]);
        }
        return ret;
    }
});
