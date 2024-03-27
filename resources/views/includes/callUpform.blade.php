<div class="alert alert-success d-none" role="alert">
    <b>Շնորհակալություն!</b>
    <i>Ձեր պատվերը ընդունված է!</i>
</div>
<form action="{{route('item.reg')}}" class="container-fluid" method="post" id="formsubmit"  onsubmit="handlePhoneNumberSubmit(event)">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputName">Անուն</label>
                <input type="text" name="name" class="form-control"
                       id="inputName" placeholder="Մուտքագրեք ձեր անունը">


                <input type="hidden" name="item_id" class="form-control"
                       id="item_id" value="{{isset($item->id)?$item->id:''}}" placeholder="Enter your name">
                <strong class="error nameError"></strong>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputPhone">Հեռախոսահմար</label>
                <input type="text" name="phone"
                       class="form-control" id="inputPhone" placeholder="Մուտքագրեք ձեր հեռախոսահամարը">
                <strong class="error phoneError"></strong>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-success">Պատվիրել <i
                    class="fa fa-cart-plus"></i></button>
        </div>
    </div>
</form>
