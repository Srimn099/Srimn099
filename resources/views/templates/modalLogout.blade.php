<!-- Modal Logout -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm p-4">
        <div class="modal-content border-0 shadow-sm">
            <h6 class="modal-title text-center mt-4" id="logoutLabel">Are you wanna sign out?</h6>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn bg-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                <form action="/signout" method="POST">
                    @csrf
                    <button type="submit" class="btn bg-primary text-white rounded-pill px-4">Sign out</button>
                </form>
            </div>
        </div>
    </div>
</div>