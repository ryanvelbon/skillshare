<form method="POST" action="route('profiles.edit', $user)">

	<input type="text" name="city" value="{{ $user->profile->city }}" />

	<button type="submit">Send</button>
	
</form>