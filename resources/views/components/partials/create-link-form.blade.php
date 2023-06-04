@props(['action',''])
<form class="needs-validation mt-5" novalidate="" action="{{ $action }}"
      method="post">
    @csrf
    <div class="col-sm-10 d-inline-block mx-4">
        <label for="url" class="form-label">Links : </label>
        <input type="text" class="form-control" id="url" placeholder="https://google.com"
               value="{{old('url')}}" name="url">
    </div>
    <button class="btn btn-primary position-relative" type="submit" style="bottom: 4px"> Generate </button>
    <x-partials.field-error-printer name="url" class="mt-2 mx-4"/>
</form>
