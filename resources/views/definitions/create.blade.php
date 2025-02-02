<x-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New definition</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('definitions.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('definitions.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Term:</strong>
                    <input type="text" name="term" class="form-control" placeholder="Term">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Definition:</strong>
                    <textarea class="form-control" style="height:150px" name="definition" placeholder="Definition"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Example:</strong>
                    <textarea class="form-control" style="height:150px" name="example" placeholder="Example"></textarea>
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12"> --}}
            {{--     <div class="form-group"> --}}
            {{--         <strong>Tags:</strong> --}}
            {{--         <textarea class="form-control" style="height:150px" name="Example" placeholder=""></textarea> --}}
            {{--     </div> --}}
            {{-- </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i>
                    Submit</button>
            </div>
        </div>
    </form>
</x-layout>
