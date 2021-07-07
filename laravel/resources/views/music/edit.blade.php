@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">曲を編集する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form
                action="{{ route('music.edit', ['id' => $song->folder_id, 'song_id' => $song->id]) }}"
                method="POST"
            >
              @csrf
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="title" id="title"
                       value="{{ old('title') ?? $song->title }}" />
              </div>
              <div class="form-group">
                <label for="due_date">Artist</label>
                <input type="text" class="form-control" name="artist" id="artist"
                       value="{{ old('artist') ?? $song->artist }}" />
              </div>
              <div class="form-group">
                <label for="status">Review</label>
                <select name="status" id="status" class="form-control">
                  @foreach(\App\Song::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $song->status) ? 'selected' : '' }}
                    >
                      {{ $val['label'] }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  @include('share.flatpickr.scripts')
@endsection