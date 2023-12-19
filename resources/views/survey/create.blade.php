<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>

    <style>
        .default_input {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Survey Form</h1>

    <form method="POST" action="{{ route('surveys.store') }}" id="form">
        @csrf
        <div class="default_input">
            <label for="name">Input Label</label>
            <input type="text" name="input_1">
        </div>

        <div>
            <label>Survey Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Start Date</label>
            <input type="date" name="start_date">
        </div>

        <div>
            <label>End Date</label>
            <input type="date" name="end_date">
        </div>

        <div class="inputs">
        </div>

        <div>
            <button class="add" type="button">Add</button>
        </div>

        <div>
            <button>Save & Generate Link</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(".add").click(function() {
            let count = $(".inputs").children('div').length;

            let input = $(".default_input").clone();

            let input_name = "inputs[" + count + "]";

            input.children("input:text").attr("name", input_name);
            input.removeClass("default_input").addClass("input_" + count).appendTo(".inputs");


        })
    </script>
</body>

</html>
