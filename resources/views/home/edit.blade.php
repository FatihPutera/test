@extends('layouts.app', ['activePage' => 'customerservice', 'titlePage' => __('customerservices')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('customerservice.update',$customerservice->cs_id) }}"
                    autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-custom">
                            <h4 class="card-title">{{ __('Edit Customer Service') }}</h4>
                            <p class="card-category">{{ __('Customer Service information') }}</p>
                        </div>
                        <div class="card-body ">
                        <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('customerservice.index') }}"
                                        class="btn btn-sm btn-custom">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Name') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('cs_name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('cs_name') ? ' is-invalid' : '' }}"
                                            name="cs_name" id="input-cs_name" type="text" placeholder="{{ __('Name') }}"
                                            value="{{ old('cs_name', $customerservice->cs_name) }}" maxlength="40" required />
                                        @if ($errors->has('name'))
                                        <span id="cs_name-error" class="error text-danger"
                                            for="input-cs_name">{{ $errors->first('cs_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('CS Number') }} <span
                                        class="text-danger">*</span><br>
                                        </label>
                                        
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('cs_number') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('cs_number') ? ' is-invalid' : '' }}"
                                            name="cs_number" id="input-cs_number" minlength="10" type="text"
                                            placeholder="{{ __('Enter number') }}" value="{{ old('cs_number', $customerservice->cs_number) }}"
                                            maxlength="40" required />
                                            <span id="name-error" class="error text-info"
                                            for="input-name"><i>example: +6288012345678</i></span>
                                        @if ($errors->has('cs_number'))
                                        <span id="cs_number-error" class="error text-danger"
                                            for="input-cs_number">{{ $errors->first('cs_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Message') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('message') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                            name="message" id="input-message" type="text"
                                            placeholder="{{ __('Enter message') }}" value="{{ old('message', $customerservice->message) }}"
                                            maxlength="40" required />
                                        @if ($errors->has('message'))
                                        <span id="message-error" class="error text-danger"
                                            for="input-message">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Display Status') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="form-group {{ $errors->has('display_status') ? ' has-danger' : '' }}">
                                    @if ($customerservice->cs_id == 1)
                                        <select class="form-control {{ $errors->has('display_status') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="display_status" id="input-display" style="color:grey;" disabled>
                                            <option value="Yes" style="text-decoration: underline;" @if ($customerservice->display_status == 'Yes') selected
                                                @endif>Yes
                                            </option>
                                        </select>
                                        @else
                                        <select class="form-control {{ $errors->has('display_status') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="display_status" id="input-display">
                                            <option value="Yes" @if ($customerservice->display_status == 'Yes') selected
                                                @endif> &nbsp;&nbsp; Yes
                                            </option>
                                            <option value="No" @if ($customerservice->display_status == 'No') selected
                                                @endif>No
                                            </option>
                                        </select>
                                        @endif
                                        @if ($errors->has('display'))
                                        <span id="display-error" class="error text-danger"
                                            for="input-display_status">{{ $errors->first('display_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Available') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="form-group {{ $errors->has('available') ? ' has-danger' : '' }}">
                                    @if ($customerservice->cs_id == 1)
                                        <input class="{{ $errors->has('available') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="available" id="input-available1"
                                             type="radio" value='{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59" }' disabled/>
                                        <label for="input-available1">Monday - Friday</label><br>
                                        @if ($errors->has('display'))
                                        <span id="available-error" class="error text-danger"
                                            for="input-available1">{{ $errors->first('available') }}</span>
                                        @endif
                                        <input class=" {{ $errors->has('available') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="available" id="input-available2"
                                             type="radio" value='{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59","saturday": "00:00-23:59","sunday": "00:00-23:59" }' checked disabled/>
                                        <label for="input-available2">Full week (24/7)</label><br>
                                        @if ($errors->has('display'))
                                        <span id="available-error" class="error text-danger"
                                            for="input-available2">{{ $errors->first('available') }}</span>
                                        @endif
                                    @else
                                        <input class="{{ $errors->has('available') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="available" id="input-available1"
                                             type="radio" value='{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59" }' @if ($customerservice->available == '{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59" }')
                                             checked @endif/>
                                        <label for="input-available1">Monday - Friday</label><br>
                                        @if ($errors->has('display'))
                                        <span id="available-error" class="error text-danger"
                                            for="input-available1">{{ $errors->first('available') }}</span>
                                        @endif
                                        <input class=" {{ $errors->has('available') ? ' is-invalid' : '' }}"
                                            data-style="btn btn-link" name="available" id="input-available2"
                                             type="radio" value='{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59","saturday": "00:00-23:59","sunday": "00:00-23:59" }' @if ($customerservice->available == '{"monday":"00:00-23:59", "tuesday":"00:00-23:59", "wednesday":"00:00-23:59", "thursday":"00:00-23:59", "friday":"00:00-23:59","saturday": "00:00-23:59","sunday": "00:00-23:59" }')
                                             checked @endif/>
                                        <label for="input-available2">Full week (24/7)</label><br>
                                        @if ($errors->has('display'))
                                        <span id="available-error" class="error text-danger"
                                            for="input-available2">{{ $errors->first('available') }}</span>
                                        @endif
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Image') }} <span
                                        class="text-danger">*</span><br>
                                    <span>(Max file size 2MB)</span></label>
                                <div class="col-sm-10">
                                    <div
                                        class="{{ $errors->has('image') ? ' has-danger' : '' }} form-file-upload form-file-simple">
                                        @if (!is_null($customerservice->cs_image))
                                        <img src="{{asset('img/team/'.$customerservice->cs_image)}}" alt="image"
                                            id="imagePreview" class="img-thumbnail img-preview">
                                        <input type="file" class="inputFileHidden d-none" name="image" accept="image/*"
                                            onchange="preview_image(event)" id="image-input">
                                        <br>
                                        @if ($errors->has('image'))
                                        <span id="image-error" class="error text-danger"
                                            for="input-_image">{{ $errors->first('image') }}</span>
                                    
                                        @endif
                                        <br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-custom">{{ __('Save') }}</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var imageDefault = $('#imagePreview').attr('src');
    $("#imagePreview").click(function (e) {
        $("#image-input").click();
    });
    function preview_image(event) {
        $('#imagePreview').removeClass('d-none');   
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    $('button[type=reset]').click(function () { 
        $('#imagePreview').attr('src', imageDefault);
    })
    $(document).ready(function(){

var prefix = "+62";
var ctrlDown = false,shiftDown = false;
var ctrlKey = 17, aKey = 65 , shiftKey = 16,rKey = 39,lKey = 37;

// mange ctrl and shift key event make flag true/false
$(document).keydown(function(e)
{
  if (e.keyCode == ctrlKey) ctrlDown = true;
  if (e.keyCode == shiftKey) shiftDown = true;
}).keyup(function(e)
{
  if (e.keyCode == ctrlKey) ctrlDown = false;
  if (e.keyCode == shiftKey) shiftDown = false;
});

// if ctrl and shift flag ture and press A or right arrow key or left arrow key it return falsel
$(document).on('keydown','#input-cs_number',function(e){
  if (ctrlDown && (e.keyCode == aKey) || shiftDown && ((e.keyCode == rKey)) || shiftDown && (e.keyCode == lKey)) return false;
});

$(document).on('keyup','#input-cs_number',function(e){
// if useing right key move cursor to first position it auto move focus at last character in text box 

if(e.keyCode == rKey || e.keyCode == lKey){
 if(this.selectionStart == 0){
    this.selectionStart = this.selectionEnd = $('#text').val().length; 
 }
}

if($.trim($(this).val()).length === 0){
 $(this).val(prefix);
}
});

// using mouse click on to first position it auto move focus at last character in text box 
$("#input-cs_number").on("contextmenu click", function(e) {
this.selectionStart = this.selectionEnd = $('#input-cs_number').val().length;  
e.preventDefault();
});

// using mouse click select all text it auto move focus at last character in text box 
$( "#input-cs_number" ).select(function() {
this.selectionStart = this.selectionEnd = $('#input-cs_number').val().length;
}); 

});
</script>
@endpush