<div class="modal fade" id="addTutorial" role="dialog" aria-labelledby="addTutorial"
     aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-inline">
                <h2 class="modal-title" id="addTutorial">Submit a Tutorial/Course</h2>
                <div class="modal-subtitle">Feel free to submit the tutorials in any language.</div>
                <div class="text-info">Paste the link below:</div>
            </div>
            <div class="modal-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                               placeholder="URL of the tutorial"
                               autocomplete="url" autofocus>
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="text-white-50 p-1 pl-2 bg-secondary mb-4">Tell us more about this tutorial (optional)
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter course name"
                               autocomplete="description" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <div>
                            <label for="nameID"></label>
                            <select id="nameID" multiple
                                    name="subcategory[]"
                                    class="form-control"
                                    style="width: 100% !important;">
                                <option></option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subcategory'))
                                <p class="text-danger" role="alert">
                                    {{ $errors->first('subcategory') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mt-3">
                        <div class="tag-label d-inline mr-3">
                            <label for="type">Tags:</label>
                        </div>
                        <div class="radio-checkbox">
                            <input type="radio" name="type" class="@error('type') is-invalid @enderror"
                                   value="free">
                            Free
                            <input type="radio" name="type" class=" @error('type') is-invalid @enderror"
                                   value="paid">
                            Paid
                            <input type="radio" name="medium" class=" @error('medium') is-invalid @enderror ml-2"
                                   value="book"> Book
                            <input type="radio" name="medium" class=" @error('medium') is-invalid @enderror"
                                   value="video"> Video
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mt-2">
                        <div class="tag-label d-inline mr-3">
                            <label for="type">This course is for:</label>
                        </div>
                        <div class="radio-checkbox">
                            <input type="radio" name="level" class="@error('level') is-invalid @enderror"
                                   value="beginner"> Beginner
                            <input type="radio" name="level" class=" @error('level') is-invalid @enderror"
                                   value="advanced"> Advanced
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mt-2">
                        <div class="tag-label d-inline mr-3">
                            <label for="type">Language:</label>
                        </div>
                        <div class="radio-checkbox">
                            @foreach($languages as $language)
                                <input type="checkbox" name="languages[]"
                                       class="@error('languages') is-invalid @enderror"
                                       value="{{$language->id}}"> {{$language->language_name}}
                            @endforeach
                            @error('languages')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="button" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    @if (count($errors) > 0)
    $('#addTutorial').modal('show');
    @endif
</script>

