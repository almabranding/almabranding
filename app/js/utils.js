function idToRute(id) {
    rute = "";
    id = str_pad(id, 9, "0", 'STR_PAD_LEFT');
    folder = str_split(id, 3);
    for (var i = 0; i < folder.length; i++)
    {
        rute = rute + folder[i] + '/';
    }
    return rute;
}

function str_pad(input, pad_length, pad_string, pad_type) {
    var half = '',
            pad_to_go;

    var str_pad_repeater = function(s, len) {
        var collect = '', i;

        while (collect.length < len) {
            collect += s;
        }
        collect = collect.substr(0, len);

        return collect;
    };

    input += '';
    pad_string = pad_string !== undefined ? pad_string : ' ';

    if (pad_type !== 'STR_PAD_LEFT' && pad_type !== 'STR_PAD_RIGHT' && pad_type !== 'STR_PAD_BOTH') {
        pad_type = 'STR_PAD_RIGHT';
    }
    if ((pad_to_go = pad_length - input.length) > 0) {
        if (pad_type === 'STR_PAD_LEFT') {
            input = str_pad_repeater(pad_string, pad_to_go) + input;
        } else if (pad_type === 'STR_PAD_RIGHT') {
            input = input + str_pad_repeater(pad_string, pad_to_go);
        } else if (pad_type === 'STR_PAD_BOTH') {
            half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
            input = half + input + half;
            input = input.substr(0, pad_length);
        }
    }

    return input;
}
function str_split(string, split_length) {
    if (split_length === null) {
        split_length = 1;
    }
    if (string === null || split_length < 1) {
        return false;
    }
    string += '';
    var chunks = [],
            pos = 0,
            len = string.length;
    while (pos < len) {
        chunks.push(string.slice(pos, pos += split_length));
    }

    return chunks;
}