{if $socials}
    <div class="main-soc">
        <div class="main-soc__list">
            {foreach $socials as $social}
                <div class="main-soc__box">
                    <a href="{$social.link}" class="main-soc__link" target="_blank" rel="nofollow">
                        {if $social.image}
                            <img src="/assets/files/{$social.image}" alt="{$social.name}">
                        {/if}
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
{/if}
