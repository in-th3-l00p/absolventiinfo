<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    public function definition(): array
    {
        $start = fake()->dateTimeBetween("+1day", "+1month");
        $end = fake()->dateTimeBetween("+1 month +1 day", "+1 month +4 days");

        return [
            "start" => $start,
            "end" => $end,

            "can_join" => true,
            "max_joins" => rand(10, 20),
            "join_expire" => fake()->dateTimeBetween(now(), $start),

            // post thangs
            "title" => fake()->sentence(),
            "content" => fake()->randomHtml(),
            "user_id" => User::query()
                ->where("role", "=", "admin")
                ->inRandomOrder()
                ->first()->id,
            "visibility" => "public",
            "content" => <<<END
            <!DOCTYPE html>
<html>

<head>
    <title>Markdown Document Example</title>
</head>

<body>

<h1>Markdown Document Example</h1>

<p>This is a basic Markdown document that demonstrates some common Markdown formatting.</p>

<h2>Headers</h2>

<p>You can create headers using the <code>#</code> symbol. There are six levels of headers:</p>

<h1>Header 1</h1>
<h2>Header 2</h2>
<h3>Header 3</h3>
<h4>Header 4</h4>
<h5>Header 5</h5>
<h6>Header 6</h6>

<h2>Emphasis</h2>

<p>You can emphasize text using asterisks or underscores:</p>

<p><em>This is italic text.</em></p>
<p><em>This is also italic text.</em></p>

<p><strong>This is bold text.</strong></p>
<p><strong>This is also bold text.</strong></p>

<h2>Lists</h2>

<p>You can create ordered and unordered lists:</p>

<p>Unordered list:</p>
<ul>
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
</ul>

<p>Ordered list:</p>
<ol>
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ol>

<h2>Links</h2>

<p>You can create links using the following syntax:</p>

<p><a href="https://www.openai.com">OpenAI</a></p>

<h2>Images</h2>

<p>You can include images like this:</p>

<p><img src="https://markdown-here.com/img/icon256.png" alt="Markdown Logo"></p>

<h2>Code</h2>

<p>You can include code inline with backticks, like <code>code</code>, or create code blocks:</p>

<pre><code>def hello_world():
    print("Hello, world!")

hello_world()
</code></pre>

<h2>Quotes</h2>

<p>You can create block quotes using the <code>&gt;</code> symbol:</p>

<blockquote>
    <p>This is a block quote.</p>
</blockquote>

<h2>Horizontal Lines</h2>

<p>You can create horizontal lines with three or more asterisks, dashes, or underscores:</p>

<hr>

<p>That's a basic overview of Markdown formatting. You can explore more features and syntax in the <a
        href="https://www.markdownguide.org/">Markdown guide</a>.</p>

</body>

</html>
END
        ];
    }

    public function unjoinable(): Factory|ActivityFactory
    {
        return $this->state(fn (array $attributes) => [
            "can_join" => false,
            "max_joins" => null,
            "join_expire" => null
        ]);
    }

    public function join_expired() {
        return $this->state(fn (array $attributes) => [
            "join_expire" => fake()->dateTimeBetween("-2 days", now())
        ]);
    }
}
