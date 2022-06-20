{{-- Hidden --}}
 <!-- Modal -->
 <div class="modal fade" id="hide-post-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-user-slash"></i>Hide Post
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to Hide Post {{ $post->id }}
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.hide', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Show --}}
 <!-- Modal -->
 <div class="modal fade" id="show-post-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h5 class="modal-title text-primary">
                    <i class="fas fa-user-check"></i>Show Post
                </h5>
            </div>
            <div class="modal-body">
                Are you sure to Show Post {{ $post->id }}
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.show', $post->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Show</button>
                </form>
            </div>
        </div>
    </div>
</div>
