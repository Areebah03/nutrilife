<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupLabel">Signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/handlesignup.php" method="post">
                    <div class="mb-3">
                        <label for="signname" class="form-label">Username</label>
                        <input type="text" class="form-control" name="signname" id="signname" aria-describedby="emailHelp">
                       
                    </div>
                    <div class="mb-3">
                        <label for="signpass" class="form-label">Password</label>
                        <input type="password" class="form-control" name="signpass" id="signpass">
                        <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="cpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="cpass" id="cpass">
                    
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="signcheck">
                        <label class="form-check-label" for="signcheck">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>