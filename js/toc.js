document.observe('dom:loaded', function() {
    var toc = $('toc'), ul, inner, h2, h3

    if (!toc) {
        return;
    }

    $$('.content .section h2', '.content .section h3').each(function(header) {
        if (!ul) {
            ul = new Element('UL', { className: 'sidebar' });
        }

        text = header.textContent || header.innerText;
        anchor = header.readAttribute('id') ||
            text.replace(/(\s|[^\w-])+/g, '-').toLowerCase();

        switch (header.tagName) {
        case 'H3':
            if (!h2) {
                return;
            }
            if (!inner) {
                inner = new Element('UL');
                h2.insert(inner);
            }
            h3 = new Element('LI');
            inner.insert(
                h3.insert(
                    new Element('A', { href: '#' + anchor }).insert(text)));
            break;

        case 'H2':
            inner = null;
            h2 = new Element('LI');
            ul.insert(
                h2.insert(
                    new Element('A', { href: '#' + anchor }).insert(text)));
            break;
        }

        header.writeAttribute('id', anchor);
    });

    toc.insert(ul);
    toc.show();
});
