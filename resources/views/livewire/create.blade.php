<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="firstname">โครงการ</label>
                @if($firstname)
                  <input type="text" name="firstname" value="{{ isset($firstname) ? $firstname : 'default_value' }}" class="form-control" wire:model="firstname">                
                  {{-- อำเภอ = {{$amphurename}}<br> --}}
                  {{-- จังหวัด = {{$provincename}} --}}
                  
                @else
                  @livewire('get-project',['table'=>'jobs','event'=>'companySelected']) 
                @endif
            </div>
            <div class="form-group">
                <label for="lastname">ที่อยู่</label>
                <input type="text" name="lastname" class="form-control" wire:model="lastname" />
            </div>

            @if (!is_null($provinces))
               <div class="form-group">
                <label for="lastname">จังหวัด</label>
                <select class="form-control" wire:model="selectedProvince">
                    <option value="">Select province</option>
                    @foreach ($provinces as $province)
                      {{-- <option value="{{$province->code}}">{{$province->name_th}}</option> --}}
                      <option value="{{ $province->code }}" @if ($selectedProvince == $province->code) selected @endif>{{ $province->name_th }}</option>
                    @endforeach
                  </select>
                  {{-- Province code = {{ $selectedProvince }} --}}
              </div>
            @endif
           

            @if (!is_null($amphures))
              <div class="form-group">
              <label for="lastname">อำเภอ</label>
                <select class="form-control" wire:model="selectedAmphure">
                  {{-- <option value="">Select amphure</option> --}}
                  @foreach ($amphures as $aumphure)
                    <option value="{{$aumphure->code}}">{{$aumphure->name_th}}</option>
                  @endforeach
                </select>
              </div>
              {{-- Amphure code = {{ $selectedAmphure }} --}}
            @endif

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" wire:model="email" />
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" wire:model="phone" />
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()" >Add Student</button>
      </div>
    </div>
  </div>
</div>
