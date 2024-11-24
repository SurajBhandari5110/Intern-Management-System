<form action="{{ route('submit.eod') }}" method="POST">
    @csrf
    <label for="intern_id">Intern ID:</label>
    <input type="number" name="intern_id" required>
    
    <label for="today">Today's Date:</label>
    <input type="date" name="today" required>
    
    <label for="tomorrow">Plans for Tomorrow:</label>
    <textarea name="tomorrow" required></textarea>
    
    <label for="issue">Issues Faced:</label>
    <textarea name="issue"></textarea>
    
    <button type="submit">Submit EOD</button>
</form>