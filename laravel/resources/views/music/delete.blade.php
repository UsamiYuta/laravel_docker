@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">曲を削除しますか？</div>
            <table class="table">
            <tr>
              <th class="fixed01">タイトル</th>
              <th class="fixed01">アーティスト名</th>
              <th class="fixed01">評価</th>
            <tbody>
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->artist }}</td>
                <td>
                  <span class="label {{ $song->status_class }}">{{ $song->status_label }}</span>
                </td>
            </tr>
            </tbody>
            </table>
            <form action="{{ route('music.delete', ['id' => $song->folder_id, 'song_id' => $song->id]) }}" method="POST">
              @csrf
              <div class="panel-body">
                <div class="text-right">
                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>削除
                  </button>
                </form>
              </div>
            </div>
        </nav>
              </div>
            </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection