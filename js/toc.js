$(document).ready(function() {
    var toc = $('#toc'), ul, inner, h2, h3

    if (!toc) {
        return;
    }

    $('.content .section h2, .content .section h3').each(function(index) {
        var header = $(this);
        if (!ul) {
            ul = $('<ul class="sidebar">');
        }

        var text = header.text();
        anchor = header.attr('id') ||
            text.replace(/(\s|[^\w-])+/g, '-').toLowerCase();

        switch (header.context.nodeName) {
        case 'H3':
            if (!h2) {
                return;
            }
            if (!inner) {
                inner = $('<ul>');
                h2.append(inner);
            }
            h3 = $('<li>');
            inner.append(
                h3.append(
                    $('<a href="#' + anchor + '">').append(text)));
            break;

        case 'H2':
            inner = null;
            h2 = $('<li>');
            ul.append(
                h2.append(
                    $('<a href="#' + anchor + '">').append(text)));
            break;
        }
        header.attr('id', anchor);
    });
    toc.append(ul);
    toc.show();
});
