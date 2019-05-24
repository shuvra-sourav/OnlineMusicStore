<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($songs as $song)
        <url>
            <loc>{{ route('song.show', array($song->id)) }}</loc>
            <lastmod>{{ $song->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        @if($song->slug !== null)
            <url>
                <loc>{{ route('song.show', array($song->id, $song->slug)) }}</loc>
                <lastmod>{{ $song->created_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endif
    @endforeach
</urlset>