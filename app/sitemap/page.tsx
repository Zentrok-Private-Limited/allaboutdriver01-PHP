import Link from 'next/link'
import { Shell } from '@/components/site-shell'
import { articles } from '@/lib/articles'
export default function Sitemap(){return <Shell><main className="mx-auto max-w-4xl px-5 py-16 lg:px-8"><h1 className="text-4xl font-extrabold text-[#102A43]">Sitemap</h1><div className="mt-8 grid gap-3 sm:grid-cols-2">{articles.map(a=><Link key={a.slug} href={`/troubleshooting/${a.slug}`} className="rounded-xl border border-slate-200 p-4 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-[#0866D9]">{a.title}</Link>)}</div></main></Shell>}
