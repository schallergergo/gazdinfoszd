<div class="col-md">


                          <!-- Name input -->
                          <div class="form-outline">
                            <label class="form-label" for="$name">{{__($displayname)}}</label>
                            <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control" {{$isrequired}}/>
                            @error($name)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
</div> <!-- end of the col-->