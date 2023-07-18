<?php get_header();?>
<div class="bg-primary text-white d-flex flex-column gap-4">
    <h1 class="fs-1">404 Error.</h1>
    <div class="message fs-5">
        <p>The page you were looking for couldn't be found.</p>
        <p>Maybe try a search?</p>
    </div>
    <form role="search" method="get" id="searchform" class="searchform" action="http://localhost:8000/">
        <div class="d-flex flex-column gap-2">
            <div class="d-flex justify-content-between border-bottom border-light pb-1">
                <input type="text" value="" name="s" id="s" placeholder="Type to search" required="" class="border-0 w-100 bg-transparent text-white" id="not-found-input-text">
                <button type="submit" id="searchsubmit" class="border-0 bg-transparent">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6656 10.7188L15.7812 13.8344C16.0719 14.1281 16.0719 14.6031 15.7781 14.8969L14.8938 15.7812C14.6031 16.075 14.1281 16.075 13.8344 15.7812L10.7188 12.6656C10.5781 12.525 10.5 12.3344 10.5 12.1344V11.625C9.39688 12.4875 8.00937 13 6.5 13C2.90937 13 0 10.0906 0 6.5C0 2.90937 2.90937 0 6.5 0C10.0906 0 13 2.90937 13 6.5C13 8.00937 12.4875 9.39688 11.625 10.5H12.1344C12.3344 10.5 12.525 10.5781 12.6656 10.7188ZM2.5 6.5C2.5 8.7125 4.29063 10.5 6.5 10.5C8.7125 10.5 10.5 8.70938 10.5 6.5C10.5 4.2875 8.70938 2.5 6.5 2.5C4.2875 2.5 2.5 4.29063 2.5 6.5Z" fill="white"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>

<?php get_footer(); ?>
