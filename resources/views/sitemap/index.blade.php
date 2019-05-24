<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ route('sitemap.albums') }}</loc>
        <lastmod>{{ $album->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.artists') }}</loc>
        <lastmod>{{ $artist->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.composers') }}</loc>
        <lastmod>{{ $composer->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.lyricists') }}</loc>
        <lastmod>{{ $lyricist->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.songs') }}</loc>
        <lastmod>{{ $song->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.categories') }}</loc>
        <lastmod>{{ $category->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>