<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({selector:'textarea'});
        tinymce.triggerSave();
    </script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>
<body>
    <form id="myform" name="editor" method="post" action="{{ url('editor/tinymce/process') }}">
        @csrf
        <textarea name="description">Hello World!</textarea>
        <button type="submit">Submit</button>
    </form>

    <script>
        $(function() {
            $('#myform').validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    description: "required",
                },
                // Specify validation error messages
                messages: {
                    description: "Description is required",
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    alert("Works");
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
