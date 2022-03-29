require("./bootstrap");

let commentCategory = "comment";

if (window.location.href.indexOf("results") != -1) {
    commentCategory = "result";
} else {
    commentCategory = "terminology";
}

$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addNewComment").click(function () {
        $("#addEditCommentForm").trigger("reset");
        $("#ajaxCommentModel").html("Add Comment");
        $("#ajax-comment-model").modal("show");
    });

    $("body").on("click", ".edit", function () {
        var id = $(this).data("id");

        // ajax
        $.ajax({
            type: "POST",
            url: `edit-${commentCategory}-comment`,
            data: {
                id: id,
            },
            dataType: "json",
            success: function (res) {
                $("#ajaxCommentModel").html("Edit Comment");
                $("#ajax-comment-model").modal("show");
                $("#id").val(res.id);
                $("#comment_name").val(res.comment_name);
                $("#forename").val(res.forename);
                $("#surname").val(res.surname);
                $("#email").val(res.email);
            },
        });
    });

    $("body").on("click", ".delete", function () {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data("id");

            // ajax
            $.ajax({
                type: "POST",
                url: `delete-${commentCategory}-comment`,
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
        var comment_name = $("#comment_name").val();
        var forename = $("#forename").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        var comment_id = "RO".concat(String($("#id").val()).padStart(2, "0"));
        $("#btn-save").html("Please Wait...");
        $("#btn-save").attr("disabled", true);

        // ajax
        $.ajax({
            type: "POST",
            url: `add-update-${commentCategory}-comment`,
            data: {
                id: id,
                comment_id: comment_id,
                comment_name: comment_name,
                forename: forename,
                surname: surname,
                email: email,
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
        message += "" + row.cells[2].innerHTML;
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
