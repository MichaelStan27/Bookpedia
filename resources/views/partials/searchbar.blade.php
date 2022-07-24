<div>
    <form action="{{ route('search') }}" id="searchForm">
        <div class="rounded-md bg-gray-100 text-base py-3 px-5 relative border-2 hover:border-slate-300">
            <input type="text" name="keyword" id="query" placeholder="Search Product (Book Title, Author)"
                autocomplete="off" class="bg-gray-100 outline-none w-full">
            <i class="flex fa-solid fa-magnifying-glass absolute right-3 text-xl"></i>
        </div>
        <button type="submit" hidden></button>
    </form>
</div>
