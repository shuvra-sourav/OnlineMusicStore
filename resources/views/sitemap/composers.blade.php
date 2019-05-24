<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($composers as $composer)
        <url>
            <loc>{{ route('composer.show', array($composer->id)) }}</loc>
            <lastmod>{{ $composer->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        @if($composer->slug !== null)
            <url>
                <loc>{{ route('composer.show', array($composer->id, $composer->slug)) }}</loc>
                <lastmod>{{ $composer->created_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endif
    @endforeach
</urlset>