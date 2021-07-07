@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
          <div class="panel-body">
            <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($folders as $folder)
              <a
                  href="{{ route('music.index', ['id' => $folder->id]) }}"
                  class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
              >
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">見つけた曲</div>
          <div class="panel-body">
            <div class="text-right">
              <a href="{{ route('music.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                曲を追加する
              </a>
            </div>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>Name</th>
              <th>Artist</th>
              <th>Review</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($songs as $song)
              <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->artist }}</td>
                <td>
                  <span class="label {{ $song->status_class }}">{{ $song->status_label }}</span>
                </td>
                <td>{{ $song->formatted_updated_at }}</td>
                <td><a href="{{ route('music.edit', ['id' => $song->folder_id, 'song_id' => $song->id]) }}">編集</a></td>
                <td><a href="{{ route('music.delete', ['id' => $song->folder_id, 'song_id' => $song->id]) }}">削除</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection