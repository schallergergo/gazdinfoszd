<div class="col-md">


                         
                          <div class="form-outline">
                            <label class="form-label" for="{{$name}}">{{__($displayname)}}</label>
                            <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control"  value="{{$value}}" {{$isrequired}}/>
                            @error($name)
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
</div> <!-- end of the col-->