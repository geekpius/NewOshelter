@foreach ($questions as $help)
<a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}" class="dropdown-content1-href text-decoration-none">{{ $help->question }}</a>
@endforeach