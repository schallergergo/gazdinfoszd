<div class="col-md">


                         
                          <div class="form-outline">
                            <label class="form-label" for="{{$name}}">{{__($displayname)}}</label>
                            <textarea  name="{{$name}}" id="{{$name}}" class="form-control"  {{$isrequired}}/>{{$value}}</textarea>
                            @error($name)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
</div> <!-- end of the col-->