require("./bootstrap");

$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addNewBook").click(function () {
        $("#addEditBookForm").trigger("reset");
        $("#ajaxBookModel").html("Add Book");
        $("#ajax-book-model").modal("show");
    });

    $("body").on("click", ".edit", function () {
        var id = $(this).data("id");

        // ajax
        $.ajax({
            type: "POST",
            url: "edit-book",
            data: {
                id: id,
            },
            dataType: "json",
            success: function (res) {
                $("#ajaxBookModel").html("Edit Book");
                $("#ajax-book-model").modal("show");
                $("#id").val(res.id);
                $("#title").val(res.title);
                $("#code").val(res.code);
                $("#author").val(res.author);
            },
        });
    });

    $("body").on("click", ".delete", function () {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data("id");

            // ajax
            $.ajax({
                type: "POST",
                url: "delete-book",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (res) {
                    window.location.reload();
                },
            });
        }
    });

    $("body").on("click", "#btn-save", function (event) {
        var id = $("#id").val();
        var title = $("#title").val();
        var code = $("#code").val();
        var author = $("#author").val();

        $("#btn-save").html("Please Wait...");
        $("#btn-save").attr("disabled", true);

        // ajax
        $.ajax({
            type: "POST",
            url: "add-update-book",
            data: {
                id: id,
                title: title,
                code: code,
                author: author,
            },
            dataType: "json",
            success: function (res) {
                window.location.reload();
                $("#btn-save").html("Submit");
                $("#btn-save").attr("disabled", false);
            },
        });
    });
});

$("#btnGet").click(function () {
    var message = "";

    //Loop through all checked CheckBoxes in GridView.
    $("#Table1 input[type=checkbox]:checked").each(function () {
        var row = $(this).closest("tr")[0];
        // message += row.cells[2].innerHTML;
        message += " " + row.cells[2].innerHTML;
        // message += " " + row.cells[4].innerHTML;
        message += "\n-----------------------\n";
    });

    //Display selected Row data in Alert Box.
    $("#message").html(message);

    return false;
});

$("#copy").click(function () {
    $("#message").select();
    document.execCommand("copy");
    alert("Copied On clipboard");
});
