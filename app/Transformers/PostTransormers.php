<?php
use League\Fractal\TransformerAbstract;
use App\Models\Post;
use App\Transformers\UserTransformers;
class PostTransormers extends TransformerAbstract
{
    protected array $availableIncludes = ['user'];

    public function transform(Post $post)
    {
        return [
            'post_id' => $post->id,
            'post_user_id' => $post->user_id,
            'title' => $post->title,
            'contents' => $post->contents,
        ];
    }

    public function includeUser(Post $post)
    {
        $user = $post->user();
        return $this->item($user, new UserTransformers());
    }
}
