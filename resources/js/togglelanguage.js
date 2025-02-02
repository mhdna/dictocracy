$("#checkLanguage").on("change", function (e) {
    if ($(this).is(":checked")) {
        $language = "de";
    } else {
        $language = "tr";
    }

    translate($language);

    //when checkbox is updated, update stored value
    sessionStorage.language = $(this).prop("checked");
});

function translate(language) {
    translate_attributes(language);
}

function textChange($selector, $text) {
    $($selector).fadeOut(300, function () {
        $(this).text($text).fadeIn(300);
    });
}

function translate_attributes(language) {
    $.getJSON(
        "https://gist.githubusercontent.com/NihatO/fcbd5918d653ddf56118c83fb0597db7/raw/a21e2251321186e8ddbcd1b81eef744e772e1811/translations_attribute.json",
        function (data) {
            $.each(data["Attributes"], function (key, val) {
                textChange('[data-translate="' + key + '"]', val[language]);
            });

            $.each(data["Selectors"], function (key, val) {
                textChange(key, val[language]);
            });

            $.each(data["AttributesStyles2"], function (key, val) {
                var element = $('[data-translate="' + key + '"]');
                if (element.length) {
                    $.each(val[language], function (key2, val2) {
                        element.css(key2, val2);
                    });
                }
            });
        },
    );
}
