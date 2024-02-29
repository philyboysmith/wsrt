<!-- component -->
<div class="fluid-grid  border-neutral border-b">
    
    <div class="span-content flex justify-start items-center  divide-x divide-neutral text-sm">
        <ul class="flex gap-3 flex-1 font-bold">
            {{ nav:breadcrumbs }}
            <li class="flex space-x-2 {{ if is_current }}current{{ /if }}">
                <a href="{{ url }}">{{ title }}</a>
                {{ if !is_current }}
                <svg class="w-2 h-2 text-slate-200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" aria-hidden="true" focusable="false" viewBox="0 0 16 16" width="100%" height="100%"><g><path d="M3.5,14.6L10.1,8L3.5,1.4L4.9,0l7.3,7.3c0.2,0.2,0.3,0.4,0.3,0.7c0,0.3-0.1,0.5-0.3,0.7L4.9,16L3.5,14.6z" fill="currentColor"></path></g></svg>
                {{ endif}}
            </li>
            {{ /nav:breadcrumbs }}
        </ul>
        <div class="font-bold uppercase text-sm p-4 border-neutral divide-x divide-neutral" >Share</div>
        {{ if facebook }}
        <a href='{{ share_links:facebook }}' target="_blank" class="p-4 border-neutral  border-neutral">
            <svg role="img" class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
            <span class="sr-only">Facebook</span>
        </a>
        {{ /if }}

        {{ if twitter }}
        <a href='{{ share_links:twitter text="Post to twitter" handle="" }}' target="_blank" class="p-4 border-neutral ">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
            </svg>
            <span class="sr-only">Twitter</span>
        </a>
        {{ /if }}

        {{ if linkedin }}
        <a href='{{ share_links:linkedin }}' target="_blank" class="p-4 border-neutral ">
            <svg role="img" class="w-4 h-4 mr-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M23.994 24H24v-8.8c0-4.306-.926-7.623-5.952-7.623a5.212 5.212 0 0 0-4.7 2.587h-.07V7.976H8.512V24h4.963v-7.935c0-2.09.4-4.11 2.978-4.11 2.546 0 2.583 2.385 2.583 4.244v7.8h4.958ZM.436 7.977h4.965V24H.436V7.977ZM2.914 0a2.893 2.893 0 0 0-2.69 1.782A2.904 2.904 0 0 0 .848 4.95a2.894 2.894 0 0 0 4.943-2.069A2.876 2.876 0 0 0 2.913 0Z" />
            </svg>
            <span class="sr-only">Linkedin</span>
        </a>
        {{ /if }}

        {{ if whatsapp }}
        <a href='{{ share_links:whatsapp }}' data-action="share/whatsapp/share" target="_blank" class="p-4 border-neutral ">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
            <span class="sr-only">Whatsapp</span>
        </a>
        {{ /if }}
    </div>

</div>