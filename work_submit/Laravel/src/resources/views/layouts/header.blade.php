<header class="site-header">

    <!-- カテゴリ -->
    <nav class="category-menu">
        <ul>
            <li class="menu-item">
                <a class="category-title" href="/products/men">MEN</a>
                <ul class="sub-menu">
                    <li>
                        <a class="category-title" href="/category/men/trending">Trending</a>
                    </li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                </ul>
            </li>
            <li class="menu-item">
               <a class="category-title" href="/products/women">WOMEN</a>
                <ul class="sub-menu">
                    <li>
                        <a class="category-title" href="/category/women/trending">Trending</a>
                    </li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                    <li>Bags</li>
                </ul>
            </li>
            <li class="menu-item">
                <a class="category-title" href="/products/kids">KIDS</a>
                <ul class="sub-menu">
                    <li>
                        <a class="category-title" href="/category/kids/trending">Trending</a>
                    </li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- アイコン -->
    <div class="header-icons">
        {{-- 検索バー --}}
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Search for products">
            <button type="submit">Search</button>
        </form>
        <span>Likes</span>
        <span>Shopping bags</span>
    </div>

</header>