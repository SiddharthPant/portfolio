import AppLayout from "@/Layouts/AppLayout";
import { Head, Link } from "@inertiajs/react";
import { Paginate, Post } from "@/types";
import { formatDistance } from "date-fns";
import { HeartIcon } from "@heroicons/react/24/outline";
import { HeartIcon as HeartIconSolid } from "@heroicons/react/24/solid";

export default function ({ posts }: { posts: Paginate<Post> }) {
    return (
        <AppLayout>
            <Head title="Home" />

            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <div className="mx-auto max-w-2xl">
                        <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            Siddharth Pant's Blog
                        </h2>
                        <p className="mt-2 text-lg leading-8 text-gray-600">
                            Hi, I'm Siddharth. I write about web development,
                            programming, and tech. I'm a software engineer and
                            have been working with different tech stacks for the
                            last decade or so. Welcome to my personal cornor on
                            the internet...
                        </p>
                        <div className="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                            {posts.data.map((post) => (
                                <article
                                    key={post.slug}
                                    className="flex max-w-xl flex-col items-start justify-between"
                                >
                                    <div className="flex items-center gap-x-4 text-xs">
                                        <time
                                            dateTime={post.published_at!}
                                            className="text-gray-500"
                                        >
                                            {formatDistance(
                                                new Date(post.published_at!),
                                                new Date(),
                                                { addSuffix: true },
                                            )}
                                        </time>
                                        {post.tags.map((tag) => (
                                            <Link
                                                href="#"
                                                className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                            >
                                                {tag.name}
                                            </Link>
                                        ))}
                                    </div>
                                    <div className="group relative">
                                        <h3 className="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <Link
                                                href={route(
                                                    "posts.show",
                                                    post.slug,
                                                )}
                                            >
                                                <span className="absolute inset-0" />
                                                {post.title}
                                            </Link>
                                        </h3>
                                        <p className="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                            {post.stripped_content}
                                        </p>
                                    </div>
                                    <div className="relative mt-2 flex items-center gap-x-4">
                                        <div className="text-xs leading-6">
                                            <div className="relative mt-2 flex items-center gap-x-4">
                                                <div className="flex items-center text-xs leading-6">
                                                    <span className="mr-1">
                                                        {post.likes_count}
                                                    </span>
                                                    {post.likes_count !==
                                                    "0" ? (
                                                        <HeartIconSolid className="h-4 w-4 text-gray-500" />
                                                    ) : (
                                                        <HeartIcon className="h-4 w-4 text-gray-500" />
                                                    )}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
