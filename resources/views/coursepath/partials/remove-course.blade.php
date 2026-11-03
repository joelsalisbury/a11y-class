<form action="{{ route('coursepath.remove', $course['slug']) }}" method="post">@csrf @method('delete')<button class="cp-text-link" type="submit">Remove this course</button></form>
