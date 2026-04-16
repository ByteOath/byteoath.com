# Claude Code Instructions — ByteOath

## How to start a session
```bash
cd byteoath.com
claude
# Claude auto-reads CLAUDE.md at project root
```

## Session opener format
Always begin with:
```
Read CLAUDE.md and .ai/memory/progress.md, then [task description].
```

## Workflow rules
- One feature per session — prevents context drift
- Confirm each file before moving to the next in multi-file tasks
- After each session: update `.ai/memory/progress.md`
- Ask Claude to explain any non-obvious decision before accepting it

## Multi-file feature template
```
Read CLAUDE.md and .ai/memory/progress.md.

I want to [feature]. Scope:
1. [file 1] — [what it does]
2. [file 2] — [what it does]
3. [file 3] — [what it does]

Complete step 1 only and wait for my confirmation before continuing.
```

## Useful slash commands
```
/files     show what Claude can see
/clear     fresh context (use when switching tasks)
/exit      end session
```

## End-of-session prompt
```
Update .ai/memory/progress.md:
- Mark [items] as done
- Add [next items] to the Next list
- Add any new architecture decisions to the decisions log
```

