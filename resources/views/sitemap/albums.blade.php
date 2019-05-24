<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($albums as $album)
        <url>
            <loc>{{ route('album.show', array($album->id)) }}</loc>
            <lastmod>{{ $album->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        @if($album->slug !== null)
            <url>
                <loc>{{ route('album.show', array($album->id, $album->slug)) }}</loc>
                <lastmod>{{ $album->created_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endif
    @endforeach
</urlset>