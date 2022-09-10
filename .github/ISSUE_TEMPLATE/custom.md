---
name: Custom issue template
about: Issueのテンプレートです。
title: ''
labels: ''
assignees: ''

---

# 概要

# 詳細仕様

# タスク
- [ ] hoge

# コミット方針
* 上記タスク1つ解決するたびに、commitしてください
* commitのたびにpushしてください。（push先は`dev/**`でOK）
* コミットメッセージには、必ず上記のタスクの完了を明記するのと、イシュー番号 #xx を記載してください。
    ```bash
    git commit -m "#xx タスクhogeを完了"
    ```

# PR方針
* 上記すべてのタスクが完了し、commit&pushが終わった段階でPRを起票してください
* PRのメッセージには、「close #(イシュー番号) 」を明記してください
