<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

</head>
<body>

    @include('header')
    <div class="container mt-2">

        @include('navigation')

        <div class="col-md-12 card-header text-center font-weight-bold">

            <h2>{{str_contains((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", 'result') ? 'Results' : 'Terminology'}} Comments</h2>

        </div>

        <div class="row">
            <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewComment" class="btn btn-success addBtn">Add New Comment</button></div>

            <!-- main section table --->
            @yield('main')

        </div>
        <div>


            <?php
            if(isset($_POST['submit'])){
            $name=$_POST["name"];
            }?>

            <form action="comment-message" class="text-center mt-5">
                <button class="btn deselectall-button" type="button" id="toggle-button">Deselect All</button>
                <button class="btn selectall-button" type="button" id="toggle-button">Select All</button>
                <input class="btn" id="btnGet" type="button" value="Get Selected" />
                <button class="btn" type="button" id="copy">Copy</button>
                <input class="btn" type="submit" value="Submit" name="submit">
                <br>
                <textarea class="mb-5 mt-2" id="message" rows="10" cols="100" name="message-comment"></textarea>
                {{-- Enter name<input type="textarea" name="name"> --}}
            </form>


            {{-- <textarea id="message" rows="10" cols="100">Selection</textarea><button type="button" id="copy">Copy</button>
            <button onclick="document.location='/comment-message'">Comment Message</button></div> --}}
        </div>

        <!-- boostrap model -->
        <div class="modal fade" id="ajax-comment-model" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ajaxCommentModel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="addEditCommentForm" name="addEditCommentForm" class="form-horizontal" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Comment</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="comment_name" name="comment_name" rows="4" cols="10" placeholder="Enter comment" value="" required=""></textarea>

                                    {{-- <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment" value="" maxlength="50" required=""> --}}
                                </div>
                            </div>

                            <div class="form-group selectedcomments">


                                <label class="col-sm-5 control-label mt-2">Forename</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="forename" name="forename" placeholder="Enter forename" value="" required="">
                                </div>

                                <label class="col-sm-5 control-label  mt-2">Surname</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" value="" required="">
                                </div>
                                <label class="col-sm-5 control-label  mt-2">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="" required="">
                                </div>
                                <label class="col-sm-5 control-label validation mt-4" id="validationLabel">Validated (1 = ✅ | 0 = ❌)</label>
                                <div class="col-sm-12" id="validationDiv">
                                    <select id="validated" name="validated" class="form-control" value="" required="">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewComment">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

        <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
