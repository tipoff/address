<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "name": "The Great Escape Room",
        "author": "The Great Escape Room",
        "alternateName": "The Great Escape Room",
        "url": "{{ $canonical ?? 'https://thegreatescaperoom.com' }}",
        "sameAs": [
            "https://www.facebook.com/thegreatescaperoom/",
            "https://twitter.com/greatescaperoom",
            "https://www.instagram.com/thegreatescaperoom/"
        ],
        "mainEntityOfPage":{
            "@type":"WebPage",
            "@id":"{{ url('/') }}"
        },
        "isPartOf": {
            "@id": "{{ url('/') }}"
        },
        "headline": "{{ $title ?? 'The Great Escape Room' }}",
        "image": {
            "@type": "ImageObject",
            "url": "https://thegreatescaperoom.com/img/ogimage.jpg",
            "height": 1200,
            "width": 630
        },
        "datePublished": "2020-10-01T12:00:00-04:00",
        "dateModified": "2020-10-12T14:00:00-04:00",
        "publisher": {
            "@type": "Organization",
            "name": "The Great Escape Room",
            "logo": {
                "@type": "ImageObject",
                "url": "https://thegreatescaperoom.com/img/logo.jpg",
                "width": 300,
                "height": 300
            }
        },
        "description": "{{ $seodescription ?? 'The Great Escape Room is one of the premier operations in the escape room industry. Come see why we have been rated so high!' }}"
    }
</script>
@isset($market)
    @if($market->locations()->exists())
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "{{ $market->locations->first()->title }}",
            "url": "{{ $market->locations->first()->path }}",
            "email":  "{{ $market->locations->first()->contact_email }}",
            "telephone": "{{ $market->locations->first()->phone }}",
            "sameAs": [
                "https://www.facebook.com/{{ $market->locations->first()->facebook ?? 'thegreatescaperoom' }}/"
                @isset($market->locations->first()->maps_url)
                    ,"{{ $market->locations->first()->maps_url }}"
                @endisset
                @isset($market->locations->first()->tripadvisor)
                    ,"{{ $market->locations->first()->tripadvisor }}"
                @endisset
                @isset($market->locations->first()->yelp)
                    ,"{{ $market->locations->first()->yelp }}"
                @endisset
            ],
            "image": {
                "@type": "ImageObject",
                "url": "{{ $market->image->url ?? 'https://thegreatescaperoom.com/img/ogimage.jpg' }}",
                "height": 1200,
                "width": 630
            },
            "description": "{{ $market->description }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $market->locations->first()->street_address }}",
                "addressLocality": "{{ $market->locations->first()->city }}",
                "addressRegion": "{{ $market->locations->first()->state }}",
                "postalCode": "{{ $market->locations->first()->zip }}",
                "addressCountry": "US"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "{{ $market->locations->first()->latitude }}",
                "longitude": "{{ $market->locations->first()->longitude }}"
            },
            "openingHoursSpecification" : [
                @if($market->locations->first()->monday_open)
                    {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": "http://schema.org/Monday",
                        "opens": "{{ $market->locations->first()->monday_open }}",
                        "closes": "{{ $market->locations->first()->monday_close }}"
                    },
                @endif
                @if($market->locations->first()->tuesday_open)
                    {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": "http://schema.org/Tuesday",
                        "opens": "{{ $market->locations->first()->tuesday_open }}",
                        "closes": "{{ $market->locations->first()->tuesday_close }}"
                    },
                @endif
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "http://schema.org/Wednesday",
                    "opens": "{{ $market->locations->first()->wednesday_open }}",
                    "closes": "{{ $market->locations->first()->wednesday_close }}"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "http://schema.org/Thursday",
                    "opens": "{{ $market->locations->first()->thursday_open }}",
                    "closes": "{{ $market->locations->first()->thursday_close }}"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "http://schema.org/Friday",
                    "opens": "{{ $market->locations->first()->friday_open }}",
                    "closes": "{{ $market->locations->first()->friday_close }}"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "http://schema.org/Saturday",
                    "opens": "{{ $market->locations->first()->saturday_open }}",
                    "closes": "{{ $market->locations->first()->saturday_close }}"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "http://schema.org/Sunday",
                    "opens": "{{ $market->locations->first()->sunday_open }}",
                    "closes": "{{ $market->locations->first()->sunday_close }}"
                }
            ],
            "priceRange": "$$",
            "paymentAccepted": "Credit Card",
            "aggregateRating": {
                "@type": "AggregateRating",
                "bestRating": "5",
                "ratingValue": "{{ $market->locations->first()->gmb_rating }}",
                "reviewCount": "{{ $market->locations->first()->gmb_reviews }}",
                "worstRating": "1"
            }
        }
    </script>
    @endif
@endisset