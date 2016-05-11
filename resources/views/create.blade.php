@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-8">
        <fieldset>
            <legend>
                Cake Inquiry Form
            </legend>

            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Type of Cake</label> <br/>
                    <input type="checkbox"  id="" name="typeOfCake"> Cupcakes <br/>
                    <input type="checkbox" id="" name="typeOfCake"> Cheesecakes <br/>
                    <input type="checkbox" id="" name="typeOfCake"> Butter Cakes <br/>
                    <input type="checkbox" id="" name="typeOfCake"> Mudcakes <br/>
                </div>
                <div class="form-group">
                    <label>Celebration Type</label> <br/>
                    <input type="radio"  id="" name="celebrationType"> Birthday <br/>
                    <input type="radio" id="" name="celebrationType"> Wedding <br/>
                    <input type="radio" id="" name="celebrationType"> Corporate <br/>
                    <input type="radio" id="" name="celebrationType"> Others <br/>
                    <input type="text" class="form-control" id="celebrationTypeOther" name="celebrationTypeOther">
                </div>
                <div class="form-group">
                    <label for="name">Tell us about your dream cake</label>
                    <textarea name="dreamCake" class="form-control"></textarea>
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