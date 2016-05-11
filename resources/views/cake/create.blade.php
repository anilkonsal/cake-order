@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-8">
        <fieldset>
            <legend>
                Cake Inquiry Form
            </legend>

            @if($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
            <form method="post" action='/cake' id='form'>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required  value="{{ old('name') }}">
                    {{ $errors->first('name')}}
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                    {{ $errors->first('email')}}
                </div>
                <div class="form-group">
                    <label>Type of Cake</label> <br/>
                    <input type="checkbox"  id="" name="type_of_cake[]" value="cupcakes"> Cupcakes <br/>
                    <input type="checkbox" id="" name="type_of_cake[]" value="cheesecases" > Cheesecakes <br/>
                    <input type="checkbox" id="" name="type_of_cake[]" value="butter cakes"> Butter Cakes <br/>
                    <input type="checkbox" id="" name="type_of_cake[]" value="mudcakes"> Mudcakes <br/>
                </div>
                <div class="form-group">
                    <label>Celebration Type</label> <br/>
                    <input type="radio"  id="celebrationTypeBirthday" name="celebration_type" required  value="birthday"> Birthday <br/>
                    <input type="radio" id="celebrationTypeWedding" name="celebration_type" value="wedding"> Wedding <br/>
                    <input type="radio" id="celebrationTypeCorporate" name="celebration_type" value="corporate"> Corporate <br/>
                    <input type="radio" id="celebrationTypeOther" name="celebration_type" value="others"> Others <br/>
                    <input type="text" class="form-control" id="celebrationTypeOtherText" name="celebration_type_other">
                </div>
                <div class="form-group">
                    <label for="name">Tell us about your dream cake</label>
                    <textarea name="dream_cake" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send away">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="Restart">
                </div>
            </form>
        </fieldset>
    </div>
</div>

@stop

@section('scripts')

<script type="text/javascript">
    $(function () {
        $('form').on('submit', function(e){
            if ($('#celebrationTypeOther').is(':checked')){
                if($('#celebrationTypeOtherText').val()=='') {
                    alert('Please enter "Others" option');
                    return false;
                    e.preventDefault();
                    $('#celebrationTypeOtherText').focus();
                }
            }
        });
        $('#celebrationTypeOtherText').on('focus',function(){
            
            $('#celebrationTypeOther').prop('checked', true);
            
        })
        
    })
</script>

@stop