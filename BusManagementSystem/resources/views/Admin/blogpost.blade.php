@extends('Admin.layouts.index')
@section('main-content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class = "container">
                            <form id="contact-form" role="form" method="POST" action="{{ route('storePost') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_name">Blog Subject *</label>
                                                <input id="form_name" type="text" name="title" class="form-control"
                                                    placeholder="Enter subject of the blog *" required="required"
                                                    data-error="Firstname is required.">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_email">Image: *</label>
                                                <input id="form_email" type="file" name="profile" class="form-control"
                                                    placeholder="Please enter your email *" required="required"
                                                    data-error="Valid email is required.">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Descrpition *</label>
                                                <textarea id="form_message" name="description" class="form-control"
                                                    placeholder="Write Description here...." rows="4"
                                                    required="required" data-error="Please, leave us a message."></textarea>
                                            </div>

                                        </div>


                                        <div class="col-md-12">

                                            <input type="submit" style="background-color: #F68044;"
                                                class="btn btn-success btn-send  pt-2 btn-block
                        "
                                                value="Post Blog">
                                        </div>

                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
