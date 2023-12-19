<h2>{{ $survey->name }}</h2>
<h3>{{ $survey->start_date->format('Y-m-d') }} to {{ $survey->end_date->format('Y-m-d') }}</h3>
<form method="POST" action="{{ route('surveys.answer', $survey->uuid) }}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="username">
    </div>
    <div>
        <label>Phone</label>
        <input type="phone" name="phone">
    </div>
    @foreach ($survey->inputs as $input)
        <div>
            <label>{{ $input->name }}</label>
            <input type="text" name="answers[{{ $input->id }}]">
        </div>
    @endforeach
    <div>
        <button>Submit</button>
    </div>
</form>
