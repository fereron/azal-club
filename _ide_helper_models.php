<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Group
 *
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property string|null $description
 * @property int $privacy
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $avatar_path
 * @property-read mixed $preloader_members
 * @property-read mixed $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupInvite[] $invites
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $members
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupPost[] $posts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupRequest[] $requests
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group wherePrivacy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $uuid
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 * @property string $email
 * @property string|null $position
 * @property int $gender
 * @property string $avatar
 * @property string $password
 * @property int $is_confirmed
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $cover
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read mixed $avatar_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupRequest[] $requestToGroup
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUuid($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\GroupRequest
 *
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupRequest whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupRequest whereUserId($value)
 */
	class GroupRequest extends \Eloquent {}
}

namespace App{
/**
 * App\GroupInvite
 *
 * @property int $id
 * @property int $group_id
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupInvite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupInvite whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupInvite whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupInvite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupInvite whereUpdatedAt($value)
 */
	class GroupInvite extends \Eloquent {}
}

namespace App{
/**
 * App\GroupPostComment
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $author
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPostComment whereUserId($value)
 */
	class GroupPostComment extends \Eloquent {}
}

namespace App{
/**
 * App\GroupUser
 *
 * @property int $group_id
 * @property int $user_id
 * @property string $role
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupUser whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupUser whereUserId($value)
 */
	class GroupUser extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @property int $id
 * @property string|null $phone_number
 * @property string|null $about
 * @property string|null $facebook
 * @property array $options
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\GroupPost
 *
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property string $body
 * @property mixed|null $attachments
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupPostComment[] $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereAttachments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPost whereUserId($value)
 */
	class GroupPost extends \Eloquent {}
}

