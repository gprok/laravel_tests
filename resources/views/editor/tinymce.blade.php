<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery Validation plugin: integration with TinyMCE</title>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinyMCE.init({
            mode: "textareas",
            // theme: "simple",
            // update validation status on change
            onchange_callback: function(editor) {
                tinyMCE.triggerSave();
                $("#" + editor.id).valid();
            }
        });
        $(function() {
            var validator = $("#myform").submit(function() {
                // update underlying textarea before submit validation
                tinyMCE.triggerSave();
            }).validate({
                ignore: "",
                rules: {
                    title: "required",
                    content: "required"
                },
                errorPlacement: function(label, element) {
                    // position error label after generated textarea
                    if (element.is("textarea")) {
                        label.insertAfter(element.next());
                    } else {
                        label.insertAfter(element)
                    }
                }
            });
            validator.focusInvalid = function() {
                // put focus on tinymce on submit validation
                if (this.settings.focusInvalid) {
                    try {
                        var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                        if (toFocus.is("textarea")) {
                            tinyMCE.get(toFocus.attr("id")).focus();
                        } else {
                            toFocus.filter(":visible").focus();
                        }
                    } catch (e) {
                        // ignore IE throwing errors when focusing hidden elements
                    }
                }
            }
        })
    </script>

</head>
<body>
<form id="myform" action="">
    @csrf
    <h3>TinyMCE and Validation Plugin integration example</h3>
    <label>Some other field</label>
    <input name="title">
    <br>
    <label>Some richt text</label>
    <textarea id="content" name="content" rows="15" cols="80" style="width: 80%"></textarea>
    <br>
    <input type="submit" name="save" value="Submit">
</form>
</body>
</html>
