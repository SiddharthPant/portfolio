import { Config } from "ziggy-js";

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};

export type Paginate<T> = {
    current_page: number;
    data: T[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];
    next_page_url: string | null;
};

export type Tag = {
    id: number;
    name: string;
};

export type Post = {
    slug: number;
    title: string;
    body?: string;
    html?: string;
    published_at: string | null;
    likes_count: number;
    dislikes_count: number;
    stripped_content: string;
    created_at: string;
    updated_at: string;

    // Relationships
    tags: Tag[];
};
