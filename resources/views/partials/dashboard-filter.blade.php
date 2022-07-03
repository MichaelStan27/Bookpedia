<h1 class="font-bold text-xl mb-2">Filter by</h1>
<form action="{{ route('search') }}" method="GET" id="filterForm">
    <input type="text" name="keyword" id="keywordInput" hidden>
    <div class="ml-2 mb-5">
        <h3 class="font-bold mb-2">Category</h3>
        <ul class="ml-2 text-neutral-600">
            <li class="mb-1">
                <input type="checkbox" name="category[]" id="fiction" value="1"
                    @if (isset($category) && in_array(1, $category)) checked @endif>
                <label class="ml-2" for="fiction">Fiction</label>
            </li>
            <li class="mb-1">
                <input type="checkbox" name="category[]" id="poetry" value="2"
                    @if (isset($category) && in_array(2, $category)) checked @endif>
                <label class="ml-2" for="poetry">Poetry</label>
            </li>
            <li class="mb-1">
                <input type="checkbox" name="category[]" id="science" value="3"
                    @if (isset($category) && in_array(3, $category)) checked @endif>
                <label class="ml-2" for="science">Science</label>
            </li>
            <li class="mb-1">
                <input type="checkbox" name="category[]" id="selfhelp" value="4"
                    @if (isset($category) && in_array(4, $category)) checked @endif>
                <label class="ml-2" for="selfhelp">Self-help</label>
            </li>
            <li class="mb-1">
                <input type="checkbox" name="category[]" id="comic" value="5"
                    @if (isset($category) && in_array(5, $category)) checked @endif>
                <label class="ml-2" for="comic">Comic</label>
            </li>
        </ul>
    </div>
    <div class="ml-2 mb-5">
        <h3 class="font-bold mb-2">Availability</h3>
        <ul class="ml-2 text-neutral-600">
            <li class="mb-1">
                <input type="radio" name="availability" id="available" value="1"
                    @if (isset($availability) && $availability == 1) checked @endif>
                <label class="ml-2" for="available">Available</label>
            </li>
            <li class="mb-1">
                <input type="radio" name="availability" id="notAvailable" value="2"
                    @if (isset($availability) && $availability == 2) checked @endif>
                <label class="ml-2" for="notAvailable">Not available</label>
            </li>
        </ul>
    </div>
    <div class="ml-2 mb-5">
        <h3 class="font-bold mb-2">Type</h3>
        <ul class="ml-2 text-neutral-600">
            <li class="mb-1">
                <input data-id="typeRadio" type="radio" name="type" id="rent" value="1"
                    @if (isset($type) && $type == 1) checked @endif>
                <label class="ml-2" for="rent">Rent</label>
            </li>
            <li class="mb-1">
                <input data-id="typeRadio" type="radio" name="type" id="sell" value="2"
                    @if (isset($type) && $type == 2) checked @endif>
                <label class="ml-2" for="sell">Sell</label>
            </li>
        </ul>
    </div>
    <h1 class="font-bold text-xl mb-2">Sort by</h1>
    <div class="ml-2 mb-5">
        <h3 class="font-bold mb-2">
            Price
            <span id="sortDesc" class="text-xs font-normal text-neutral-400 capitalize">
                @if (isset($type))
                    @switch($type)
                        @case(1)
                            Rent
                        @break

                        @case(2)
                            Sell
                        @break
                    @endswitch
                @else
                    Select a type first
                @endif
            </span>
        </h3>
        <ul class="ml-2">
            <li class="mb-1">
                <input data-id="sortRadio" type="radio" name="price" id="low" value="asc"
                    @if (!isset($type)) disabled @endif
                    @if (isset($priceSort) && $priceSort == 'asc') checked @endif>
                <label data-id="sortRadio"
                    class="ml-2 @if (!isset($type)) {{ 'text-neutral-400' }} @else {{ 'text-neutral-600' }} @endif"
                    for="low">Low-High</label>
            </li>
            <li class="mb-1">
                <input data-id="sortRadio" type="radio" name="price" id="high" value="desc"
                    @if (!isset($type)) disabled @endif
                    @if (isset($priceSort) && $priceSort == 'desc') checked @endif>
                <label data-id="sortRadio"
                    class="ml-2 @if (!isset($type)) {{ 'text-neutral-400' }} @else {{ 'text-neutral-600' }} @endif"
                    for="high">High-Low</label>
            </li>
        </ul>
    </div>
    <div class="ml-2 mb-5">
        <h3 class="font-bold mb-2">Title</h3>
        <ul class="ml-2 text-neutral-600">
            <li class="mb-1">
                <input type="radio" name="title" id="ascending" value="asc"
                    @if (isset($titleSort) && $titleSort == 'asc') checked @endif>
                <label class="ml-2" for="ascending">Ascending</label>
            </li>
            <li class="mb-1">
                <input type="radio" name="title" id="descending" value="desc"
                    @if (isset($titleSort) && $titleSort == 'desc') checked @endif>
                <label class="ml-2" for="descending">Descending</label>
            </li>
        </ul>
    </div>
    <div class="text-center mt-8">
        <button type="submit"
            class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 font-medium shadow-md">Filter</button>
    </div>
</form>
